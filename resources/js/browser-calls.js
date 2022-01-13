// import $ from "jquery";
const { Device } = require('twilio-client');
/**
 * Twilio Client configuration for the browser-calls-laravel
 * example application.
 */

// Store some selectors for elements we'll reuse
var callStatus = $("#call-status");
var answerButton = $(".answer-button");
var callSupportButton = $(".call-support-button");
var hangUpButton = $(".hangup-button");
var callCustomerButtons = $(".call-customer-button");

// time duration during call
var h1 = document.getElementsByTagName('h1')[0],
    start = document.getElementById('start'),
    stop = document.getElementById('stop'),
    clear = document.getElementById('clear'),
    seconds = 0, minutes = 0, hours = 0,
    t;

var device = null;

/* Helper function to update the call status bar */
function updateCallStatus(status) {
    callStatus.attr('placeholder', status);
}

/* Get a Twilio Client token with an AJAX request */
$(document).ready(function() {
    setupClient();
});

function setupHandlers(device) {
    device.on('ready', function (_device) {
        updateCallStatus("Ready");
    });

    /* Report any errors to the call status display */
    device.on('error', function (error) {
        updateCallStatus("ERROR: " + error.message);
    });

    /* Callback for when Twilio Client initiates a new connection */
    device.on('connect', function (connection) {
        // hide loader
        document.getElementById("call_loader").style.display = "none";
        // mute call
        connection.mute(true);       
        // Enable the hang up button and disable the call buttons
        hangUpButton.prop("disabled", false);
         $(".hangup-button").show();
        // callCustomerButtons.prop("disabled", true);
         $(".call-customer-button").hide();
        callSupportButton.prop("disabled", true);
        answerButton.prop("disabled", true);

        // If phoneNumber is part of the connection, this is a call from a
        // support agent to a customer's phone
        if ("phoneNumber" in connection.message) {
            updateCallStatus("In call with " + connection.message.phoneNumber);
        } else {
            // This is a call from a website user to a support agent
            updateCallStatus("In call with support");
        }

        timer();
    });

    /* Callback for when a call ends */
    device.on('disconnect', function(connection) {
        // Disable the hangup button and enable the call buttons
        hangUpButton.prop("disabled", true);
         $(".call-customer-button").show();
         $(".hangup-button").show();
        callCustomerButtons.prop("disabled", false);
        callSupportButton.prop("disabled", false);

        updateCallStatus("Ready");
        h1.textContent = "00:00:00";
        seconds = 0; minutes = 0; hours = 0;
        clearTimeout(t);
    });

    /* Callback for when Twilio Client receives a new incoming call */
    device.on('incoming', function(connection) {
        updateCallStatus("Incoming support call");

        // Set a callback to be executed when the connection is accepted
        connection.accept(function() {
            updateCallStatus("In call with customer");
        });

        // Set a callback on the answer button and enable it
        answerButton.click(function() {
            connection.accept();
        });
        answerButton.prop("disabled", false);
    });
};

function setupClient() {
    $.post("/token", {
        forPage: window.location.pathname,
        _token: $('meta[name="csrf-token"]').attr('content')
    }).done(function (data) {
        // Set up the Twilio Client device with the token
        device = new Device();
        device.setup(data.token);

        setupHandlers(device);
    }).fail(function () {
        updateCallStatus("Could not get a token from server!");
    });

};

/* Call a customer from a support ticket */
window.callCustomer = function() {
    console.log('hello');
    let allAreFilled = true;
    document.getElementById('contactForm').querySelectorAll("[required]").forEach(function(i) {
        if (!i.value){    
            allAreFilled = false;
        } 
    })
    if (allAreFilled) {    
    document.getElementById("call_loader").style.display = "block";
    document.getElementById("endbtn").style.display=="inline";
    let server = $('#server').val();
    let phoneNumber = $('#phoneNumber').val();
    let from_number = $('#from_number').val();
    let pin = $('#pin').val();
    let participant_id = $('#participant_id').val();
    updateCallStatus("Calling " + phoneNumber + "...");
    var params = {"server":server,"phoneNumber": phoneNumber,"from_number": from_number,"pin": pin,"participant_id":participant_id};
    device.connect(params);
    }
};

/* Call the support_agent from the home page */
window.callSupport = function() {
    updateCallStatus("Calling support...");

    // Our backend will assume that no params means a call to support_agent
    device.connect();
};

/* End a call */
window.hangUp = function() {
    device.disconnectAll();
};

function add() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    
    h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

    timer();
}
function timer() {
    t = setTimeout(add, 1000);
}


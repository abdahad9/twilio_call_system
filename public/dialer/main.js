

var element = $('.floating-chat');
var myStorage = localStorage;

// if (!myStorage.getItem('chatID')) {
//     myStorage.setItem('chatID', createUUID());
// }

setTimeout(function() {
    element.addClass('enter');
}, 1000);

element.click(openElement);

function openElement() {
    // var messages = element.find('.messages');
    // var textInput = element.find('.text-box');
    // element.find('>i').hide();
    // element.addClass('expand');
    // element.find('.chat').addClass('enter');
    // var strLength = textInput.val().length * 2;
    // textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
    // element.off('click', openElement);
    // element.find('.header button').click(closeElement);
}

function closeElement() {
    element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
    setTimeout(function() {
        element.find('.chat').removeClass('enter').show()
        element.click(openElement);
    }, 500);
}

$('.number-dig').click(function(){
    //add animation
    addAnimationToButton(this);
    //add number
    var currentValue = $('.phoneString input').val();
    var valueToAppend = $(this).attr('name');
    $('.phoneString input').val(currentValue + valueToAppend);
    
    // checkNumber();
  });
  var timeoutTimer = true;
  var timeCounter = 0;
  var timeCounterCounting = true;
  $('.action-dig').click(function(){
    //add animation
    addAnimationToButton(this);
    if($(this).hasClass('goBack')){
      var currentValue = $('.phoneString input').val();
      var newValue = currentValue.substring(0, currentValue.length - 1);
      $('.phoneString input').val(newValue);
      checkNumber();
    }else if($(this).hasClass('call')){
      if($('.call-pad').hasClass('in-call')){
      }else{
        setTimeout(function(){
          setToInCall();
          timeoutTimer = true;
          looper();
        },500);
      }
    }else{
      
    }
  });
  var addAnimationToButton = function(thisButton){
    //add animation
    $(thisButton).removeClass('clicked');
    var _this = thisButton;
    setTimeout(function(){
      $(_this).addClass('clicked');
    },1);
  };
  
$("#phoneNumber").inputmask({"mask": "(+999) 999-999999"});
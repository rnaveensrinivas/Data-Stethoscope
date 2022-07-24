var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;


var recognition = new SpeechRecognition();

var textbox =  $("#textbox");

var ins = $("#ins");
 
var content = '';

recognition.continuous = true;

recognition.onstart = function (){
    ins.text("Recognition Started");
}

$("#start-btn").click(function(event){
    if(content.length){
        content += '';
    }
    recognition.start();
})
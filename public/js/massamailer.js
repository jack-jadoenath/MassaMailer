
var headerSizeInput = document.getElementById('header_size');
var headerColorInput = document.getElementById('header_color');
var headerFontSizeInput = document.getElementById('header_fontsize');
var headerFontColorInput = document.getElementById('header_fontcolor');

var footerSizeInput = document.getElementById('footer_size');
var footerColorInput = document.getElementById('footer_color');
var footerFontSizeInput = document.getElementById('footer_fontsize');
var footerFontColorInput = document.getElementById('footer_fontcolor');

var previewFrame = document.getElementById('preview');

function setPreview(){
    console.log("Preview");
    while (previewFrame.firstChild) {
        previewFrame.removeChild(previewFrame.firstChild);
    }

    

}
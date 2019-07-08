
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
        previewFrame.contentWindow.document.open();
        previewFrame.contentWindow.document.write("");
        previewFrame.contentWindow.document.close();

    previewFrame.contentWindow.document.open();
    previewFrame.contentWindow.document.write('<html><head><style>.header{ height: ' + headerSizeInput.value + '; background: ' + headerColorInput.value + ';}.header h1{ font-size: ' + headerFontSizeInput.value + '; color: ' + headerFontColorInput.value + ';}.footer{ height: ' + footerSizeInput.value + '; background: ' + footerColorInput.value + ';}.footer p{ font-size: ' + footerFontSizeInput.value + '; color: ' + footerFontColorInput.value + ';}</style></head><body><div class="header" ><h1>Mijn Test Email Header</h1></div><div class="content" >Dit is een Test Email voor het testen van de Template, het tekst zal dus niet worden gebruikt voor de echte email alleen de kleuren en groote.</div><div class="footer" ><p>Mijn Test Email Footer</p></div></body></html>');
    previewFrame.contentWindow.document.close();
}

function selectPackage($id){
    sessionStorage.packange = $id;
    console.log($id);
}
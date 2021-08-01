var FormControlsBase = function() {}

FormControlsBase.prototype.Comments_OnkeyUp = function() {
    var formElement = document.getElementById('tbComments');
    var charsLeft = 500 - (formElement.value.length);

    formElement = document.getElementById('commentsCharsLeft');
    formElement.innerHTML = charsLeft;
}

var FexFormControls = new FormControlsBase();
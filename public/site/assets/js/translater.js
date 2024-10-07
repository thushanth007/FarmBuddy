document.addEventListener('googleTranslateLoaded', function() {
    console.log('Google Translate has loaded');
});

function translateLanguage(lang) {
    var selectField = document.querySelector(".goog-te-combo");
    if (selectField) {
        selectField.value = lang;
        selectField.dispatchEvent(new Event('change'));
    } else {
        console.error("Google Translate combo box not found.");
    }
}

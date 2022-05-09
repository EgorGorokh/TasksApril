function showFileSize() {
    let input, file;

    if (!window.FileReader) {
        bodyAppend("p", "The file API isn't supported on this browser yet.");
        return;
    }

    input = document.getElementById('fileinput');
    if (!input) {
        bodyAppend("p", "Um, couldn't find the fileinput element.");
    } else if (!input.files) {
        bodyAppend("p", "This browser doesn't seem to support the `files` property of file inputs.");
    } else if (!input.files[0]) {
        bodyAppend("p", "Please select a file before clicking 'Load'");
    } else {
        file = input.files[0];
        bodyAppend("div", "File " + file.name + " is " + file.size + " bytes in size");
    }
}

function bodyAppend(tagName, innerHTML) {
    let elm;

    elm = document.createElement(tagName);
    elm.innerHTML = innerHTML;
    document.body.appendChild(elm);
}

function check_extension(filename, submitId) {
    let hash = {
        '.txt': 1,
        '.jpeg': 1,
        '.jpg': 1,
        '.png': 1,
    };
    let re = /\..+$/;
    let ext = filename.match(re);
    let submitEl = document.getElementById(submitId);
    if (hash[ext]) {
        submitEl.disabled = false;

        return true;

    } else {
        alert("Invalid filename, please select another file");
        submitEl.disabled = true;

        return false;
    }
}
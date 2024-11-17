 let ultimoCheckboxAtivo = null;
        const originalFontSizes = new Map();


function pegaAsFontes() {
    return Array.from(document.querySelectorAll('*'))
        .filter(element => {
            const fontSize = window.getComputedStyle(element).fontSize;
            return fontSize && fontSize !== '0px';
        })
        .map(element => ({
            element: element,
            fontSize: window.getComputedStyle(element).fontSize
        }));
}

function storeOriginalFontSizes() {
    const fontSizes = pegaAsFontes();
    //console.log(fontSizes)
    fontSizes.forEach(item => {
        if (!originalFontSizes.has(item.element)) {
            originalFontSizes.set(item.element, item.fontSize);
        }
    });
}
function P__font() {
    const fonteAtual = localStorage.getItem('com.beco_fonteWeb_localData');
    if (fonteAtual !== 'P') {
        storeOriginalFontSizes();
        originalFontSizes.forEach((originalSize, element) => {
            const currentFontSize = parseFloat(originalSize);
            const newFontSize = currentFontSize - 2;
            element.style.fontSize = `${newFontSize}px`;
        });
        localStorage.setItem('com.beco_fonteWeb_localData', 'P');
        window.parent.postMessage('fntP?Size', '*');
    }
}

function Regular__font() {
    const fonteAtual = localStorage.getItem('com.beco_fonteWeb_localData');
    if (fonteAtual !== 'R') {
        originalFontSizes.forEach((originalSize, element) => {
            element.style.fontSize = originalSize;
        });
        localStorage.setItem('com.beco_fonteWeb_localData', 'R');
        window.parent.postMessage('fntR?Size', '*');
    }
}

function G__font() {
    const fonteAtual = localStorage.getItem('com.beco_fonteWeb_localData');
    if (fonteAtual !== 'G') {
        storeOriginalFontSizes();
        originalFontSizes.forEach((originalSize, element) => {
            const currentFontSize = parseFloat(originalSize);
            const newFontSize = currentFontSize + 2;
            element.style.fontSize = `${newFontSize}px`;
        });
        localStorage.setItem('com.beco_fonteWeb_localData', 'G');
        window.parent.postMessage('fntG?Size', '*');
    }
}

function P__fontNVerif() {
    storeOriginalFontSizes();
    originalFontSizes.forEach((originalSize, element) => {
        const currentFontSize = parseFloat(originalSize);
        const newFontSize = currentFontSize - 2;
        element.style.fontSize = `${newFontSize}px`;
    });
}

function Regular__fontNVerif() {
    originalFontSizes.forEach((originalSize, element) => {
        element.style.fontSize = originalSize
    })
}

function G__fontNVerif() {
    storeOriginalFontSizes();
    originalFontSizes.forEach((originalSize, element) => {
        const currentFontSize = parseFloat(originalSize);
        const newFontSize = currentFontSize + 2;
        element.style.fontSize = `${newFontSize}px`;
    })
}


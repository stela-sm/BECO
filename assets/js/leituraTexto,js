const TEMPO_ESPERA = 3000;
const timeouts = new Map();
let voces = [];
let utterance;
const checkbox = document.getElementById('audioRecurso_site');

function garantirVoces() {
    return new Promise((resolve) => {
        const synth = window.speechSynthesis;
        if (synth) {
            const verificarVoces = () => {
                voces = synth.getVoices();
                if (voces.length === 0) {
                    setTimeout(verificarVoces, 100);
                } else {
                    resolve();
                }
            };
            verificarVoces();
        } else {
            console.error('Speech Synthesis não é suportado pelo seu navegador.');
            resolve();
        }
    });
}

function listarVoces() {
    console.log('Vozes disponíveis:');
    voces.forEach(voz => {
        console.log(`Nome: ${voz.name}, Idioma: ${voz.lang}`);
    });
}

function falarTexto(texto, idioma) {
    const synth = window.speechSynthesis;
    if (synth) {
        let voz = voces.find(v => v.lang === idioma);
        if (!voz) {
            console.error(`Voz para o idioma ${idioma} não encontrada.`);
            return;
        }

        console.log(`Usando a voz: ${voz.name}`);
        if (utterance) {
            synth.cancel();
        }
        utterance = new SpeechSynthesisUtterance(texto);
        utterance.voice = voz;
        synth.speak(utterance);
    } else {
        console.error('Speech Synthesis não é suportado pelo seu navegador.');
    }
}

function obterIdioma() {
    return new Promise((resolve) => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                fetch(`https://geocode.xyz/${position.coords.latitude},${position.coords.longitude}?json=1`)
                    .then(response => response.json())
                    .then(data => {
                        const pais = data.prov;
                        if (pais === 'BR') {
                            resolve('pt-BR');
                        } else {
                            resolve('pt-BR');
                        }
                    });
            }, () => {
                resolve('pt-BR');
            });
        } else {
            resolve('pt-BR');
        }
    });
}

function atualizarTabIndex() {
    const elementos = document.querySelectorAll('h1, p, span, h2, h3, h4, h5, a, li, button, img');
    if (checkbox.checked) {
        elementos.forEach(elemento => {
            elemento.setAttribute('tabindex', '0');
        });
    } else {
        elementos.forEach(elemento => {
            elemento.removeAttribute('tabindex');
        });
    }
}

function adicionarEventosElemento(elemento) {
    const obterTextoElemento = (elem) => {
        if (elem.tagName.toLowerCase() === 'img') {
            return elem.getAttribute('alt') || ''; // Se for uma imagem, pega o alt
        }
        return elem.textContent.trim(); // Para outros elementos, pega o texto
    };

    elemento.addEventListener('mouseover', async () => {
        if (!checkbox.checked) return;

        const timeoutId = setTimeout(async () => {
            elemento.classList.add('highlight');
            const texto = obterTextoElemento(elemento);
            if (texto) {
                console.log(`Texto a ser falado: "${texto}"`);
                const idioma = await obterIdioma();
                console.log('Idioma selecionado:', idioma);
                falarTexto(texto, idioma);
            }
        }, TEMPO_ESPERA);

        timeouts.set(elemento, timeoutId);
    });

    elemento.addEventListener('mouseout', () => {
        if (timeouts.has(elemento)) {
            clearTimeout(timeouts.get(elemento));
            timeouts.delete(elemento);
        }
        elemento.classList.remove('highlight');
        if (utterance) {
            window.speechSynthesis.cancel();
        }
    });

    elemento.addEventListener('focus', async () => {
        if (!checkbox.checked) return;

        const texto = obterTextoElemento(elemento);
        if (texto) {
            console.log(`Texto a ser falado ao focar: "${texto}"`);
            const idioma = await obterIdioma();
            console.log('Idioma selecionado:', idioma);
            falarTexto(texto, idioma);
        }
    });

    elemento.addEventListener('blur', () => {
        if (utterance) {
            window.speechSynthesis.cancel();
        }
        elemento.classList.remove('highlight');
    });
}

function inicializar() {
    if (checkbox.checked) {
        garantirVoces().then(() => {
            listarVoces();
            atualizarTabIndex();

            checkbox.addEventListener('change', atualizarTabIndex);

            const elementos = document.querySelectorAll('h1, p, span, h2, h3, h4, h5, a, li, button, img');
            elementos.forEach(elemento => {
                adicionarEventosElemento(elemento);
            });
        });
    } else {
        // Limpa todos os eventos quando o checkbox é desativado
        const elementos = document.querySelectorAll('h1, p, span, h2, h3, h4, h5, a, li, button, img');
        elementos.forEach(elemento => {
            elemento.removeAttribute('tabindex');
            elemento.classList.remove('highlight');
            elemento.replaceWith(elemento.cloneNode(true)); // Remove todos os eventos
        });
    }
}

checkbox.addEventListener('change', inicializar);

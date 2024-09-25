const msg__notificacoes = [
    // Notificações de "concurso"
    {
        title: "Participe do nosso concurso e ganhe prêmios incríveis!",
        content: "Inscreva-se agora e tenha a chance de ganhar prêmios incríveis no nosso concurso mensal!",
        tag: "concurso"
    },
    {
        title: "Não perca a chance de se destacar no nosso concurso!",
        content: "Participe e mostre seu talento. Os vencedores serão anunciados em breve!",
        tag: "concurso"
    },
    {
        title: "Nosso concurso está aberto! Inscreva-se já!",
        content: "As inscrições vão até o final do mês. Não fique de fora!",
        tag: "concurso"
    },
    {
        title: "Você já participou do concurso? Grandes prêmios te esperam!",
        content: "Entre na competição e mostre suas habilidades. Inscreva-se hoje!",
        tag: "concurso"
    },
    {
        title: "O concurso do mês está acontecendo, envie sua inscrição!",
        content: "Aproveite esta oportunidade e envie sua inscrição antes que seja tarde!",
        tag: "concurso"
    },
    {
        title: "Últimos dias para se inscrever no concurso!",
        content: "Não deixe para última hora. Inscreva-se já!",
        tag: "concurso"
    },
    {
        title: "Desafie-se: participe do nosso concurso!",
        content: "Teste suas habilidades e ganhe reconhecimento.",
        tag: "concurso"
    }
];

function criarID() {
    return 'notif_' + Math.random().toString(36).substr(2, 9);
}

function salvarNotificacao(notification) {
    let notifications = JSON.parse(localStorage.getItem('notifications')) || [];
    notifications.push(notification);
    localStorage.setItem('notifications', JSON.stringify(notifications));
}

function loadNotificacoesUsuario() {
    let notifications = JSON.parse(localStorage.getItem('notifications')) || [];
    const now = new Date();

    notifications.forEach(notification => {
        const notificationDate = new Date(notification.date);
        const diffDays = Math.floor((now - notificationDate) / (1000 * 60 * 60 * 24));

        if (diffDays < 60) {
            criarADIV__deNotificaaoUsuario(notification);
        } else {
            deleteNotificacao(notification.id);
        }
    });

    verif_qtdNotiUsuario();
}

function criarADIV__deNotificaaoUsuario(notification) {
    const container = document.getElementById('notificacoesResp');
    const notificationDiv = document.createElement('div');
    notificationDiv.classList.add('notification');
    notificationDiv.id = notification.id;
    notificationDiv.style.border = notification.clicked ? 'var(--default_border)' : '2px solid rgba(0, 123, 255, 0.5)';

    const title = notification.title.length > 20 ? notification.title.substr(0, 20) + '...' : notification.title;

    notificationDiv.innerHTML = `
        <div class="notification-content">
            <span class="notification-title">${title}</span>
            <span class="notification-time">${datahora_noti(new Date(notification.date))}</span>
            <button class="delete-btn">Excluir</button>
        </div>
    `;

    notificationDiv.querySelector('.delete-btn').addEventListener('click', function(event) {
        event.preventDefault();
        deleteNotificacao(notification.id);
        notificationDiv.remove();
    });

    notificationDiv.addEventListener('click', function() {
        notification.clicked = true;
        updateNotificacao(notification);
        notificationDiv.style.border = 'var(--default_border)';
        
        // Abrir SweetAlert com informações da notificação
        Swal.fire({
            title: notification.title,
            text: notification.content,
            icon: 'info',
            confirmButtonText: 'Fechar'
        });
    });

    container.appendChild(notificationDiv);
}


function deleteNotificacao(id) {
    let notifications = JSON.parse(localStorage.getItem('notifications')) || [];
    notifications = notifications.filter(notification => notification.id !== id);
    localStorage.setItem('notifications', JSON.stringify(notifications));
    verif_qtdNotiUsuario();
}

function updateNotificacao(updatedNotification) {
    let notifications = JSON.parse(localStorage.getItem('notifications')) || [];
    notifications = notifications.map(notification => notification.id === updatedNotification.id ? updatedNotification : notification);
    localStorage.setItem('notifications', JSON.stringify(notifications));
    verif_qtdNotiUsuario();
}

function datahora_noti(date) {
    const now = new Date();
    const diffMs = now - date;
    const diffMinutes = Math.floor(diffMs / (1000 * 60));
    const diffHours = Math.floor(diffMs / (1000 * 60 * 60));
    const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));

    if (diffMinutes < 1) {
        return "agora";
    } else if (diffDays === 1) {
        return "ontem";
    } else if (diffDays > 1) {
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        return `${day}/${month}`;
    } else if (diffHours >= 1) {
        return `${diffHours}h atrás`;
    } else {
        return `${diffMinutes}min atrás`;
    }
}

function criarNotificacao() {
    const now = new Date();
    const randomMessage = msg__notificacoes[Math.floor(Math.random() * msg__notificacoes.length)];
    const notification = {
        id: criarID(),
        title: randomMessage.title,
        content: randomMessage.content,
        tag: randomMessage.tag,
        date: now,
        clicked: false
    };

    salvarNotificacao(notification);
    criarADIV__deNotificaaoUsuario(notification);
}

function verificarNovoEnvioNotificacao() {
    const lastNotificationTime = localStorage.getItem('lastNotificationTime');
    const now = Date.now();
    const tenDays = 10 * 24 * 60 * 60 * 1000;

    if (!lastNotificationTime || now - lastNotificationTime >= tenDays) {
        criarNotificacao();
        localStorage.setItem('lastNotificationTime', now);
    }
}

function verif_qtdNotiUsuario() {
    const container = document.getElementById('notificacoesResp');
    const notificationElements = container ? container.children : [];
    let blueBorderCount = 0;

    for (let i = 0; i < notificationElements.length; i++) {
        const style = window.getComputedStyle(notificationElements[i]);
        if (style.border === '2px solid rgba(0, 123, 255, 0.5)') {
            blueBorderCount++;
        }
    }

    const classNumberDataNoti = document.querySelector('#classNumberData__noti');
    if (classNumberDataNoti) {
        classNumberDataNoti.style.display = blueBorderCount > 0 ? 'block' : 'none';
    }
}

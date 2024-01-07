importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyDdW91znTQMTPpV-LbT50zTUWwTOjX7VHg",
    projectId: "direct2u-d3914",
    messagingSenderId: "804115700875",
    appId: "1:804115700875:web:94b26c45e122f7ef4a488e"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});

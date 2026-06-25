self.addEventListener('push', function(event) {
    if (event.data) {
        let data = event.data.json();
        
        event.waitUntil(
            self.registration.showNotification(data.title, {
                body: data.body,
                icon: data.icon,
                data: data.data,
                actions: data.actions
            })
        );
    }
});

self.addEventListener('notificationclick', function(event) {
    event.notification.close();
    if (event.notification.data && event.notification.data.url) {
        event.waitUntil(
            clients.openWindow(event.notification.data.url)
        );
    } else if (event.action && event.action !== '') {
        event.waitUntil(
            clients.openWindow(event.action)
        );
    }
});

self.addEventListener('install', event => {
    console.log('Service Worker установлен');
    self.skipWaiting();
});

self.addEventListener('activate', event => {
    console.log('Service Worker активирован');
    event.waitUntil(clients.claim());
});

self.addEventListener('fetch', event => {
    const url = new URL(event.request.url);

    if (url.origin === 'https://v-item.ru' && url.pathname.startsWith('/api/v1/lots')) {
        event.respondWith(
            fetch(event.request).then(response => {
                return response.text().then(text => {
                    let modifiedResponse = text.replace(/"duration":\d+/g, '"duration":0');
                    return new Response(modifiedResponse, {
                        headers: response.headers,
                        status: response.status,
                        statusText: response.statusText
                    });
                });
            }).catch(error => {
                console.error('Ошибка перехвата и модификации:', error);
                return fetch(event.request);
            })
        );
    } else {
        event.respondWith(fetch(event.request));
    }
});

// Yuvann Wellness PWA Service Worker
const CACHE_NAME = 'yuvann-v1';
const OFFLINE_URL = '/offline';

// Assets to pre-cache on install
const PRECACHE_URLS = [
    '/',
    '/products',
    '/manifest.json',
    '/icons/icon-192.png',
    '/icons/icon-512.png',
];

// ─── Install ──────────────────────────────────────────────────────────────────
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(PRECACHE_URLS);
        })
    );
    self.skipWaiting();
});

// ─── Activate ─────────────────────────────────────────────────────────────────
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames
                    .filter((name) => name !== CACHE_NAME)
                    .map((name) => caches.delete(name))
            );
        })
    );
    self.clients.claim();
});

// ─── Fetch Strategy ───────────────────────────────────────────────────────────
self.addEventListener('fetch', (event) => {
    const { request } = event;
    const url = new URL(request.url);

    // Skip non-GET and cross-origin requests
    if (request.method !== 'GET' || url.origin !== location.origin) {
        return;
    }

    // Skip Livewire AJAX, admin routes, and API calls
    if (
        url.pathname.startsWith('/admin') ||
        url.pathname.startsWith('/livewire') ||
        url.pathname.includes('__livewire') ||
        request.headers.get('X-Livewire')
    ) {
        return;
    }

    // ── Static assets (JS, CSS, fonts, images) → Cache-first ──────────────────
    if (
        url.pathname.match(/\.(js|css|woff2?|ttf|otf|png|jpg|jpeg|webp|gif|svg|ico|mp4|webm)$/)
    ) {
        event.respondWith(
            caches.match(request).then((cached) => {
                if (cached) return cached;
                return fetch(request).then((response) => {
                    if (response.ok) {
                        const clone = response.clone();
                        caches.open(CACHE_NAME).then((cache) => cache.put(request, clone));
                    }
                    return response;
                });
            })
        );
        return;
    }

    // ── HTML navigation → Network-first, fallback to cache ────────────────────
    event.respondWith(
        fetch(request)
            .then((response) => {
                if (response.ok) {
                    const clone = response.clone();
                    caches.open(CACHE_NAME).then((cache) => cache.put(request, clone));
                }
                return response;
            })
            .catch(() => {
                return caches.match(request).then((cached) => {
                    if (cached) return cached;
                    // Last resort: return the cached home page
                    return caches.match('/');
                });
            })
    );
});

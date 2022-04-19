import _Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

const Echo = new _Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Echo = Echo

Echo.channel('posts.likes')
    .listen('PostLiked', ({post, user}) => {
        const el = document.querySelector(`[data-post-id="${post.id}"]`)

        if (el) {
            const countEl = el.querySelector('span')

            countEl.textContent = post.likes_count
        }
    })

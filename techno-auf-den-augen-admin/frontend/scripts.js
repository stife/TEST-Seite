console.log('Dashboard loaded');

async function api(action, data) {
    const formData = new URLSearchParams(data);
    const response = await fetch(`../backend/api.php?action=${action}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: formData.toString()
    });
    return response.json();
}

document.getElementById('postForm').addEventListener('submit', async e => {
    e.preventDefault();
    const pageId = document.getElementById('pageId').value;
    const message = document.getElementById('message').value;
    const result = await api('createPost', { pageId, message });
    alert(JSON.stringify(result));
});

document.getElementById('scheduleForm').addEventListener('submit', async e => {
    e.preventDefault();
    const pageId = document.getElementById('sPageId').value;
    const message = document.getElementById('sMessage').value;
    const time = new Date(document.getElementById('publishTime').value).getTime() / 1000;
    const result = await api('schedulePost', { pageId, message, timestamp: time });
    alert(JSON.stringify(result));
});

document.getElementById('refreshPosts').addEventListener('click', async () => {
    const pageId = document.getElementById('pageId').value;
    const posts = await fetch(`../backend/api.php?action=getPosts&pageId=${pageId}`).then(r => r.json());
    const list = document.getElementById('posts');
    list.innerHTML = '';
    posts.data?.forEach(p => {
        const li = document.createElement('li');
        li.textContent = p.message || p.id;
        list.appendChild(li);
    });
});

document.getElementById('client-toggle').addEventListener('click', function() {
    event.preventDefault();
    document.getElementById('client-form').style.display = 'block';
    document.getElementById('HR-form').style.display = 'none';
});

document.getElementById('HR-toggle').addEventListener('click', function() {
    event.preventDefault();
    document.getElementById('client-form').style.display = 'none';
    document.getElementById('HR-form').style.display = 'block';
});
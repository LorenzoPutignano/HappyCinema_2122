Email.send({
    Host: "smtp.elasticemail.com",
    Username: "happycinema@gmail.com",
    Password: "15E53EFC9CA965980351FE9ACF978FC0948D",
    To: 'lorenzoptg0@gmail.com',
    From: "happycinema@gmail.com",
    Subject: "This is the subject",
    Body: "And this is the body"
}).then(
    message => alert(message)
);


// happycinema@gmail.com
// Password
// 15E53EFC9CA965980351FE9ACF978FC0948D
// Copia
// Server
// smtp.elasticemail.com
// Porta
// 2525
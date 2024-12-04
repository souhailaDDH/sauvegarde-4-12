const express = require('express');
const app = express();
const http = require('http').Server(app);
const io = require('socket.io')(http);
const mariadb = require('mariadb');

// Configuration de la base de données
const pool = mariadb.createPool({
  host: '185.213.22.50', //  l'adresse de votre serveur MariaDB
  user: 'souhaila', //  nom d'utilisateur MariaDB
  password: 'plop', //  mot de passe MariaDB
  database: 'souhaila' //  nom de base de données
});

async function main() {
  console.log("Connexion à la base de données et création de la table si nécessaire...");

  let connection;
  try {
    connection = await pool.getConnection();

    // Créer la table "messages" si elle n'existe pas
    //await connection.query(`
      //CREATE TABLE IF NOT EXISTS messages (
        //id INT AUTO_INCREMENT PRIMARY KEY,
        // content TEXT NOT NULL)
    // `);

    console.log("Table 'messages' prête.");
  } catch (err) {
    console.error("Erreur lors de la configuration de la base de données : ", err);
  } finally {
    if (connection) connection.release(); // Libérer la connexion
  }
}

app.use("/", express.static(__dirname + "/public"));
app.get('/hello', (req, res) => {
  res.send('<h1>Hello</h1>');
});

io.on('connection', function (socket) {
  console.log("Un utilisateur s'est connecté : ", socket.id);

  socket.on('disconnect', function () {
    console.log("Un utilisateur s'est déconnecté : ", socket.id);
  });

  socket.on('chat-message', async function (message) {
    io.emit('chat-message', message);
    console.log("Message reçu : ", message);

    let connection;
    try {
      connection = await pool.getConnection();
      await connection.query("INSERT INTO messages (content) VALUES (?)", [message]);
      console.log("Message inséré dans la base de données.");
    } catch (err) {
      console.error("Erreur lors de l'insertion du message : ", err);
    } finally {
      if (connection) connection.release();
    }
  });

  socket.on('login', function () {
    console.log('Demande de LOGIN');
  });
});

http.listen(3005, function () {
  console.log('Le serveur écoute sur le port *:3005');
  main();
});

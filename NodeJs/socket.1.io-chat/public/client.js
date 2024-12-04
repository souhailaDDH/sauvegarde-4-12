/* global io */
var socket = io("http://185.213.22.50:3005", { autoConnect: false });

// Fonction pour générer une couleur aléatoire
function generateRandomColor() {
  return '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0');
}

$("#btConnect").on("click", function () {
  var username = $("#loginName").val().trim();
  if (!username) {
    alert("Veuillez saisir un nom d'utilisateur.");
    return;
  }

  socket.data = { username: username };
  socket.connect();

  // Envoyer un événement de connexion avec le nom d'utilisateur
  socket.emit('login', { username: username });

  // Afficher la messagerie après connexion
  $('#authSection').fadeOut();
  $('#chat').fadeIn();
});

/**
 * Envoi d'un message
 */
$('#chat form').submit(function (e) {
  e.preventDefault();

  var messageText = $('#m').val().trim();

  if (!messageText) {
    $('#m').val('');
    $('#chat input').focus();
    return;
  }

  var storedColor = localStorage.getItem('userColor_');
  var color = storedColor || generateRandomColor();

  // Construire l'objet message
  var message = {
    username: socket.data.username,
    text: messageText,
    timestamp: new Date().toISOString(),
    color: color
  };

  // Envoyer le message au serveur
  socket.emit('chat-message', message);

  $('#m').val('');
  $('#chat input').focus();

  // Sauvegarder la couleur dans localStorage
  localStorage.setItem('userColor_', color);
});

/**
 * Réception d'un message
 */
socket.on('chat-message', function (message) {
  var formattedTime = new Date(message.timestamp).toLocaleTimeString();
  var messageDisplay = `
    <span style="color:${message.color}">${formattedTime} - ${message.username}:</span> ${message.text}`;
  $('#messages').append($('<li>').html(messageDisplay));

  // Défilement automatique vers le bas
  $('#messages').scrollTop($('#messages')[0].scrollHeight);
});

// Gestion des erreurs de connexion
socket.on('connect_error', function (error) {
  console.error("Erreur de connexion :", error);
});

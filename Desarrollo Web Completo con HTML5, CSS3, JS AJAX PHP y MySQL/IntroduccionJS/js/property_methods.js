const player = {
    play : function(id){
        console.log(`Reproduciendo canción con el ID: ${id}`);
    },
    pause : function() {
        console.log(`Pausando...`);
    },
    createPlaylist : function(name) {
        console.log(`Creando la playlist: ${name}`);
    },
    playPlaylist : function(name) {
        console.log(`Reproduciendo la playlist: ${name}`);
    }
}

player.deleteSong = function(id) {
    console.log(`Eliminando la canción: ${id}`);
}

console.log(player.play(3840));
console.log(player.pause());
console.log(player.deleteSong(360));
console.log(player.createPlaylist("Heavy Metal"));
console.log(player.playPlaylist("Heavy Metal"));

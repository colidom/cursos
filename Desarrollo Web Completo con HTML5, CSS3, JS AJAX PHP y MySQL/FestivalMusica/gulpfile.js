function task(callback) {
  console.log("Mi primera tarea");

  callback();
}

// Así llamamos a una función en Node.js
exports.task = task;

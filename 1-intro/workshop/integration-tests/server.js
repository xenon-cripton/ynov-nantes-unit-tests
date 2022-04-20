const mongoose = require('mongoose');

// Connect to MongoDB
mongoose.connect('mongodb://mongo:27017/docker-node-mongo', { useNewUrlParser: true })
  .then(() => console.log('MongoDB Connected'))
  .catch(err => console.log(err));


const app = require('./src/app')

const port = 3333;
app.listen(port, () => console.log('Server running...'));
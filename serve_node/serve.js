import express from 'express';
import cors from 'cors';
import { WebSocketServer } from 'ws';


const app = express();
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cors({ origin: 'http://127.0.0.1:8000' }));




app.get('/', (req, res) => res.send('Server ready'));
const port = 7000;
const server = app.listen(port, () => console.log(`Server running on port ${port}`));


const wss = new WebSocketServer({ server, clientTracking: true, perMessageDeflate: false });

wss.on('connection', (connection, req) => {
    console.log('có người vừa kết nối ');
    [...wss.clients].forEach(client => {
        client.send(JSON.stringify('có người vừa kết nối '));


    });


    connection.on('message', (message) => {
        console.log('Received message:', message);

        // Xử lý tin nhắn từ client ở đây

        // Gửi phản hồi cho client
        [...wss.clients].forEach(client => {
            client.send(JSON.stringify('Received message: '));


        });
    });
    connection.on('close', () => {

    });
});
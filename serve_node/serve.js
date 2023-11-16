import express from "express";
import { createServer } from "http";
import { Server } from "socket.io";
import cors from "cors";

const app = express();
app.use(cors({ origin: "*" }));
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

const server = createServer(app);
const io = new Server(server, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"],
        allowedHeaders: ["Content-Type"],
    },
});

app.get("/", (req, res) => {
    res.send("start");
});

io.on("connection", (socket) => {
    socket.on("chat-message", (message) => {
        console.log("Received message from client:", message);
        io.emit("chat-message", message);
    });
    socket.on("chat-admin", (message) => {
        console.log("Received message from admin:", message);

        io.emit("chat-admin", message);

    });

});

server.listen(7000, () => {
    console.log("listening on *:7000");
});

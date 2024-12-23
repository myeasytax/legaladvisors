const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const fs = require('fs');

const app = express();

// Middleware
app.use(cors());
app.use(bodyParser.json());

// In-memory database (replace with a real database in production)
const subscriptions = [];

// API Endpoint to handle subscriptions
app.post('/api/subscribe', (req, res) => {
    const { fullName, email, plan, paymentMethod } = req.body;

    // Validate request
    if (!fullName || !email || !plan || !paymentMethod) {
        return res.status(400).json({ error: 'All fields are required' });
    }

    // Add new subscription
    const newSubscription = {
        id: subscriptions.length + 1,
        fullName,
        email,
        plan,
        paymentMethod,
        date: new Date()
    };

    subscriptions.push(newSubscription);

    // Optionally save to a file or database
    fs.writeFileSync('./database/subscriptions.json', JSON.stringify(subscriptions, null, 2));

    res.status(201).json({ message: 'Subscription successful', subscription: newSubscription });
});

// Start the server
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});

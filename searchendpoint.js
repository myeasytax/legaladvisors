const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(bodyParser.json());

// Sample lawyer data
const lawyers = [
    {
        id: 1,
        name: 'John Doe',
        expertise: ['Family Law', 'Immigration Law'],
        location: 'New York',
        website: 'https://johndoelaw.com'
    },
    {
        id: 2,
        name: 'Jane Smith',
        expertise: ['Corporate Law', 'Intellectual Property'],
        location: 'San Francisco',
        website: 'https://janesmithlaw.com'
    }
];

// Search endpoint
app.get('/api/search', (req, res) => {
    const query = req.query.query.toLowerCase();

    // Filter lawyers by expertise or location
    const results = lawyers.filter(lawyer =>
        lawyer.expertise.some(exp => exp.toLowerCase().includes(query)) ||
        lawyer.location.toLowerCase().includes(query)
    );

    res.json(results);
});

const PORT = 3000;
app.listen(PORT, () => console.log(`Server running on http://localhost:${PORT}`));

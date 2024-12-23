const mongoose = require('mongoose');
const Lawyer = mongoose.model('Lawyer', new mongoose.Schema({
    name: String,
    expertise: [String],
    location: String,
    website: String
}));

app.get('/api/search', async (req, res) => {
    const query = req.query.query.toLowerCase();
    const results = await Lawyer.find({
        $or: [
            { expertise: { $regex: query, $options: 'i' } },
            { location: { $regex: query, $options: 'i' } }
        ]
    });
    res.json(results);
});

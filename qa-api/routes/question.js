const express = require('express');
const router = express.Router();
const question = require('../services/question');

/**
 * GET - Get all questions paginated
 */
router.get('/', async function (req, res, next) {
    // Set defaults if not specified in query
    req.query.type = req.query.type ? req.query.type : 'onlyAnswered';
    req.query.page = req.query.page ? req.query.page : 1;
    try {
        // Check if only answered flag is true
        if(req.query.type == 'onlyAnswered') {
            res.json(await question.getMultipleAnswered(parseInt(req.query.page)));
        } else {
            res.json(await question.getMultiple(parseInt(req.query.page)));
        }
    } catch (err) {
        console.error(`Error while getting questions ${err.message}`);
        next(err);
    }
});


/**
 * GET - Get question by id
 */
router.get('/:id', async function (req, res, next) {
    console.log(req.params.id);
    try {
        res.json(await question.getOne(req.params.id));
    } catch (err) {
        console.error(`Error while getting question ${err.message}`);
        next(err);
    }
});

/**
 * POST - Create question
 */
router.post('/', async function (req, res, next) {
    try {
        res.json(await question.create(req.body));
    } catch (err) {
        console.error(`Error while creating question ${err.message}`);
        next(err);
    }
});

/**
 * PATCH - Answer question
 */
router.patch('/:id', async function (req, res, next) {
   try {
      res.json(await question.answer(req.body, req.params.id));
   } catch (err) {
       console.error(`Error while answering question ${err.message}`);
   }
});

/**
 * DELETE - Delete question by id
 */
router.delete('/:id', async function (req, res, next) {
    try {
        res.json(await question.remove(req.params.id));
    } catch (err) {
        next(err);
    }
});

module.exports = router;
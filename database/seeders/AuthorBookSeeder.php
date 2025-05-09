<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;

class AuthorBookSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            ['name' => 'Homer', 'bio' => 'An ancient Greek poet traditionally said to be the author of the epic poems the Iliad and the Odyssey.'],
            ['name' => 'Virgil', 'bio' => 'A Roman poet best known for writing the Aeneid, an epic poem that tells the story of Aeneas.'],
            ['name' => 'Confucius', 'bio' => 'A Chinese philosopher and politician of the Spring and Autumn period, whose teachings deeply influenced East Asia.'],
            ['name' => 'Plato', 'bio' => 'A student of Socrates and teacher of Aristotle, known for founding the Academy in Athens and writing philosophical dialogues.'],
            ['name' => 'Kalidasa', 'bio' => 'A classical Sanskrit author, widely regarded as the greatest poet and dramatist in the Sanskrit language.']
        ];

        $authorMap = [];

        foreach ($authors as $author) {
            $savedAuthor = Author::updateOrCreate(
                ['name' => $author['name']],
                ['bio' => $author['bio']]
            );
            $authorMap[$author['name']] = $savedAuthor->id;
        }

        $books = [
            ['author_name' => 'Homer', 'title' => 'The Iliad', 'description' => 'An epic poem recounting the significant events of the final weeks of the Trojan War.'],
            ['author_name' => 'Homer', 'title' => 'The Odyssey', 'description' => 'The epic journey of Odysseus returning home after the fall of Troy.'],
            ['author_name' => 'Homer', 'title' => 'Homeric Hymns', 'description' => 'A collection of ancient Greek hymns celebrating individual gods.'],

            ['author_name' => 'Virgil', 'title' => 'The Aeneid', 'description' => 'The journey of Aeneas from Troy to Italy, where he becomes the ancestor of the Romans.'],
            ['author_name' => 'Virgil', 'title' => 'Georgics', 'description' => 'A didactic poem about agriculture and rural life.'],
            ['author_name' => 'Virgil', 'title' => 'Eclogues', 'description' => 'A series of ten pastoral poems that blend mythology with contemporary Roman politics.'],

            ['author_name' => 'Confucius', 'title' => 'The Analects', 'description' => 'A collection of sayings and ideas attributed to Confucius and his disciples.'],
            ['author_name' => 'Confucius', 'title' => 'Book of Rites', 'description' => 'Outlines social norms, governmental organization, and ritual conduct in ancient China.'],

            ['author_name' => 'Plato', 'title' => 'The Republic', 'description' => 'A Socratic dialogue concerning justice and the order and character of the just city-state.'],
            ['author_name' => 'Plato', 'title' => 'Phaedrus', 'description' => 'Dialogues between Socrates and Phaedrus on love and rhetoric.'],
            ['author_name' => 'Plato', 'title' => 'Symposium', 'description' => 'A philosophical text exploring the nature of love through a series of speeches.'],

            ['author_name' => 'Kalidasa', 'title' => 'Shakuntala', 'description' => 'A classical Sanskrit play about love, memory loss, and reunion.'],
            ['author_name' => 'Kalidasa', 'title' => 'Meghaduta', 'description' => 'A poem where an exiled yaksha sends a message to his lover via a cloud.'],
            ['author_name' => 'Kalidasa', 'title' => 'Raghuvamsha', 'description' => 'An epic poem about the lineage of King Raghu.'],
            ['author_name' => 'Kalidasa', 'title' => 'Kumarasambhavam', 'description' => 'A narrative of the birth of Kumara (Skanda), the son of Shiva and Parvati.']
        ];

        foreach ($books as $book) {
            Book::updateOrCreate(
                ['title' => $book['title']], 
                [
                    'author_id' => $authorMap[$book['author_name']],
                    'description' => $book['description']
                ]
            );
        }
    }
}

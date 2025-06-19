<?php
namespace app\commands;

use yii\console\Controller;
use app\models\Candidate;
use app\models\Resume;

class SeedController extends Controller
{
    public function actionCandidates()
    {
        $candidates = [
            ['name' => 'Иван Петров', 'email' => 'ivan@example.com'],
            ['name' => 'Мария Сидорова', 'email' => 'maria@example.com'],
        ];

        foreach ($candidates as $data) {
            $candidate = new Candidate();
            $candidate->attributes = $data;
            $candidate->save(false);
            
            $resume = new Resume();
            $resume->candidate_id = $candidate->id;
            $resume->skills = 'PHP, Yii2, MySQL';
            $resume->experience = 3;
            $resume->expected_salary = 120000;
            $resume->save(false);
        }
        
        echo "Успешно добавлено " . count($candidates) . " кандидата\n";
    }
}
?>
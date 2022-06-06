<?php

namespace backend\controllers;
// header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
date_default_timezone_set('Africa/Nairobi');
use DateTime;
use DateInterval;
use Yii;
use yii\base\ErrorException;


use yii\db\Command;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use backend\models\Operators;
use backend\models\Branches;
use backend\models\Candidates;
use backend\models\Categories;
use backend\models\Votes;


use yii\db\Expression; // to randomise objects selected from the database


use yii\rest\ActiveController;


/**
 * ApiController implements the api actions
 */
class ApiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        // 'actions' => [
                        //     'fetch-questions',
                        //     'get-question',
                        'allow' => true,
                        // 'role' => ['@', '?']
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    throw new \yii\web\NotFoundHttpException('The resource you are looking for cannot be found');
                }

            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'ca' => ['GET'],
                    'get-branches' => ['GET'],
                    'candidates' => ['GET'],
                    'fetch-questions' => ['GET'],
                ],
            ],

        ];

    }


    /**
     * @inheritdoc
     */
    public function beforeAction($action) {
        if ($action->id == 'get-counties'  || $action->id == 'candidates' ){

            $this->enableCsrfValidation = false;
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
        return parent::beforeAction($action);
    }


    public function actionGetCounties() {
        try {
            $query =  new Query();
            $counties = $query->select(['county'])  
                ->from('branches')
                ->distinct()
                ->all();
        
                
            return $data = [
                'message' => 'result found',
                'data' => $counties
                 
            ];

        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function actionGetBranches() {

        if (isset($_GET['county'])) {
            $county = $_GET['county'];
            } else {
                $data =  array(
                    'message' => 'missing county',
                    'data' => null
                );
            return $data;
        }

        try {
    
            return $data = [
                'message' => 'result found',
                'data' => Branches::find()->where(['county' => $county ])->orderBy(['branch' => 'ASC'])->all(),
                'count' => count(Branches::find()->where(['county' => $county ])->orderBy(['branch' => 'ASC'])->all())
                 
            ];

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function actionCandidates() {


        try {
            $sql = "
                SELECT 
                    cnd.id AS candidate_id, 
                    cnd.name AS candidate_name, 
                    cnd.votes AS votes, cnd.id, 
                    cat.name as category, 
                    cat.id AS category_id
                FROM candidates cnd
                INNER JOIN
                (
                    SELECT `category_id`, MAX(votes) AS max_votes
                    FROM candidates
                    GROUP BY `category_id`
                ) t2
                    ON cnd.`category_id` = t2.`category_id` AND cnd.votes = t2.max_votes
                LEFT JOIN categories cat ON cat.id=cnd.category_id GROUP BY cnd.category_id;
            ";
            $summary = \Yii::$app->db->createCommand($sql)->queryAll();

            return $data = [
                'status' =>true,
                'message description'=>'leaderboard summary and all contestants(candidates)',
                'data' => [
                    'summary' => $summary,
                    'candidates' => Candidates::find()
                                            // ->where(['status' => true ])
                                            ->orderBy(['votes' => SORT_DESC])
                                            ->all()
                ]
            ];

        } catch (\Throwable $th) {
            throw $th;
        }
    }




    
}

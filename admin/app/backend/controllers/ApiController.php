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
                    'categories' => ['GET'],
                    'candidates' => ['GET'],
                    'fetch-questions' => ['GET'],
                ],
            ],

            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    // restrict access to
                    'Origin' => [ 'http://161.35.6.91', 'https://africamasharikiawards-cra.vercel.app/', 'http://localhost:3000' ],
                    // 'Origin' => ['*'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Method' => ['POST', 'PUT', 'GET'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Request-Headers' => ['X-Wsse'],
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],
    
            ],

        ];

    }


    /**
     * @inheritdoc
     */
    public function beforeAction($action) {
        if ($action->id == 'categories'  || $action->id == 'candidates' ){

            $this->enableCsrfValidation = false;
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
        return parent::beforeAction($action);
    }


    public function actionCategories() {
        try {
        
            $categories = Categories::find()->all();
            return  [ 'status' => true, 'message description'=>'result for all categories ','data'=>$categories ];

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

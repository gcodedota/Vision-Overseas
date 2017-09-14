<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;
        $id = null;
        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
            $this->set(compact('page', 'subpage'));

        $this->loadModel('content');

        $content= $this->content->findByPage($page)->all();
        $content = $content->toArray();
        $this->set('content',$content);

        $homepage= $this->content->findByPage('home')->all();
        $homepage = $homepage->toArray();
        $this->set('homepage',$homepage);
//        debug($homepage);
//        die();

        $achievement= $this->content->findByPage('achievement')->all();
        $achievement = $achievement->toArray();
        $this->set('achievement',$achievement);


        $this->loadModel('feedbacks');
        $feedback = $this->feedbacks->findByStatus('active')->all();
        $feedback = $feedback->toArray();
//        debug($feedback);
//        die();
        $this->set('feedback',$feedback);

        $this->loadModel('visas');

        $visas = $this->visas->find('all')->all();
        $visas = $visas->toArray();
        $this->set('visas', $visas);

        $this->loadModel('Sliders');

        $sliders = $this->Sliders->find('all')->all();
        $sliders = $sliders->toArray();
        $this->set('sliders', $sliders);
//        debug($sliders[1]['path']);
//        die();

        $this->loadModel('categories');
        $categories = $this->categories->find('all',[
            'contain' => ['Visas']
        ]);
        $categories = $categories->toArray();
        $this->set('categories', $categories);
   //     debug($categories);


        $this->loadModel('staffmembers');

        $staffmembers = $this->staffmembers->find('all')->all();
        $staffmembers = $staffmembers->toArray();
        $this->set('staffmembers', $staffmembers);

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }

    }
}

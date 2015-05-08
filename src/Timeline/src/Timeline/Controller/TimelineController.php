<?php
namespace Timeline\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Timeline\Model\Timeline;          // <-- Add this import
use Timeline\Form\TimelineForm;       // <-- Add this import

class TimelineController extends AbstractActionController
{
    
    protected $timelineTable;
    
    public function indexAction()
     {
         return new ViewModel(array(
             'timelines' => $this->getTimelineTable()->fetchAll(),
         ));
     }

// Add content to this method:
     public function addAction()
     {
         $form = new TimelineForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $timeline = new Timeline();
             
             
             
             
             $form->setInputFilter($timeline->getInputFilter());
             $form->setData($request->getPost());

             
//              \Zend\Debug\Debug::dump($request->getPost(), "label");
              
//              die;
             
             
             if ($form->isValid()) {
                 
//                  \Zend\Debug\Debug::dump($form->getData(), "label");
                 
//                  die;
                 $timeline->exchangeArray($form->getData());
                 $this->getTimelineTable()->saveTimeline($timeline);

                 // Redirect to list of timelines
                 return $this->redirect()->toRoute('timeline');
             }
         }
         return array('form' => $form);
     }

    // Add content to this method:
     public function editAction()
     {
         $id = (int) $this->params()->fromRoute('id', 0);

         if (!$id) {

             return $this->redirect()->toRoute('timeline', array(
                 'action' => 'add'
             ));
         }

         // Get the Timeline with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $timeline = $this->getTimelineTable()->getTimeline($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('timeline', array(
                 'action' => 'index'
             ));
         }

         $form  = new TimelineForm();
         $form->bind($timeline);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($timeline->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getTimelineTable()->saveTimeline($timeline);

                 // Redirect to list of timelines
                 return $this->redirect()->toRoute('timeline');
             }
         }

         return array(
             'idtimeline' => $id,
             'form' => $form,
         );
     }

    public function deleteAction()
     {
         $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('timeline');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('idtimeline');
                 $this->getTimelineTable()->deleteTimeline($id);
             }

             // Redirect to list of timelines
             return $this->redirect()->toRoute('timeline');
         }

         return array(
             'id'    => $id,
             'timeline' => $this->getTimelineTable()->getTimeline($id)
         );
     }
    
    public function getTimelineTable()
    {
        if (!$this->timelineTable) {
            $sm = $this->getServiceLocator();
            $this->timelineTable = $sm->get('Timeline\Model\TimelineTable');
        }
        return $this->timelineTable;
    }
}
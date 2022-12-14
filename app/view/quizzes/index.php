<?php require APPROOT . '/view/inc/header.php'; ?>

    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Exams</h2>
        </div>
        <div class="col-md-6">
            <?php if(isAdmin()) : ?>
                <a href="<?php echo URLROOT; ?>/quizzes/addbasic" class="btn btn-primary pull-right">
                    <i class="fa fa-pencil"></i> Add Exam
                </a>
            <?php endif; ?>
        </div>                
    </div>
    
    <?php flash('attempt_count_exceeded'); ?>
    <?php flash('no_access'); ?>
    
    <?php foreach($data['quizzes'] as $quiz) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $quiz->title; ?></h4>
            <div class="bg-light p-2 mb-3">
                Exam by <?php echo $quiz->name; ?>
                <br>
                <small>Published at <?php echo $quiz->quizCreated; ?></small>                
            </div>
            <a href="<?php echo URLROOT; ?>/quizzes/attempt/<?php echo $quiz->quizId; ?>" class="btn btn-dark">Try Exam</a>
        </div>
    <?php endforeach; ?>

<?php require APPROOT . '/view/inc/footer.php'; ?>
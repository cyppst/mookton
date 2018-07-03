<?php
if ($currentPage == 'job.php') {
    ?>
    window.location = '/ms/mpdf/job_pdf.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';
    <?php
} else if ($currentPage == 'salary.php') {
    ?>
    window.location = '/ms/mpdf/salary_pdf.php?IDedit=<?php echo $_SESSION['staff_ID'] ?>';
    <?php
}
?>



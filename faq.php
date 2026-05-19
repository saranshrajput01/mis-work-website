<!DOCTYPE html>
<html lang="en">
   <head>
      <!--====== Required meta tags ======-->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!--====== Title ======-->
      <title>MIS Website</title>

      <?php include 'inc/head.php'; ?>
      <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>


   </head>
   <body class="">

      <!--====== Start Header Section ======-->
      <?php include 'inc/header.php'; ?>
      <!--====== End Header Section ======-->

        <!--====== Start Page-banner section ======-->
        <section class="page-banner bg_cover position-relative z-1">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="page-title text-center">
                            <h1>Frequently Asked Questions</h1>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End Page-banner section ======-->
        <!--====== Start About section ======-->
        <section class="about-area about-area-v3 pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 mx-auto">
                         <div class="faq-container">


                     <div class="faq-item">
                        <div class="faq-question">1. What is your refund policy?</div>
                        <div class="faq-answer">
                              We offer a 30-day money-back guarantee. If you are not satisfied with our product, you can request a full refund within 30 days.
                        </div>
                     </div>

                     <div class="faq-item">
                        <div class="faq-question">2. Do you offer customer support?</div>
                        <div class="faq-answer">
                              Yes, we provide 24/7 customer support through email, live chat, and phone.
                        </div>
                     </div>

                     <div class="faq-item">
                        <div class="faq-question">3. Can I upgrade my plan later?</div>
                        <div class="faq-answer">
                              Absolutely! You can upgrade your plan at any time from your account settings.
                        </div>
                     </div>

                  </div>
                    </div>


                </div>
            </div>
        </section><!--====== End About section ======-->

      <!--====== Start Footer ======-->
      <?php include 'inc/footer.php'; ?>
      <!--====== End Footer ======-->
      <script>
    const questions = document.querySelectorAll('.faq-question');

    questions.forEach(question => {
        question.addEventListener('click', () => {
            question.classList.toggle('active');
            const answer = question.nextElementSibling;
            answer.classList.toggle('open');
        });
    });
</script>
   </body>
</html>
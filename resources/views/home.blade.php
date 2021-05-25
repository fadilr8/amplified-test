<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Test Kesehatan Online by Ibunda.id - Konseling Dengan Psikolog</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  @include('layouts/navbar')
  <div id="survey" class="my-0 mx-auto">
    <div class="body-survey py-2 px-7">
      <div id="introStep">
        <div class="flex flex-wrap justify-center items-center -mx-4">
          <div class="w-full max-w-full flex-grow-0 flex-shrink-0 body-element px-4">
            <img src="https://www.ibunda.id/tespsikologi/assets/img/landing/mhst.png" class="img-fluid landing-img block w-full max-w-full h-auto mx-auto my-6">
            <h1 class="head-intro mb-2">Mental Health Test</h1>
            <p class="text-description">
              Mental Health Test membantu kamu mengetahui keyakinan dirimu dalam menghadapi situasi untuk berhasil mencapai hasil yang kamu inginkan.			</p>
            <button type="button" onclick="startQuiz()" 
              class="block bg-blue-500 hover:bg-transparent 
                text-white font-semibold hover:text-blue-700
                py-4 px-5 border border-transparent w-1/2 my-8 mx-auto
                hover:border-blue-500 rounded">Mulai</button>
          </div>
        </div>
      </div>
      <div id="approvalStep">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-12 body-element">
            <div class="mb-6 pt-3">
              <b>
                <p class="text-left question-intro-description-dr">1. Test ini TIDAK ditujukan untuk mendiagnosis gangguan psikologis, namun untuk membantu mengenali gambaran dirimu saat ini</p>
                <p class="text-left question-intro-description-dr">2. Apabila kamu mengalami gejala yang mengganggu, segeralah berkonsultasi ke psikolog/psikiater untuk mendapatkan penanganan yang tepat.</p>
              </b>
            </div>
      
            <div class="answer-area mb-2">
              <div class="custom-control">
                <label for="aggreement0" class="container-radio">
                  <input name="0" id="aggreement0" type="radio" class="custom-control-input box-control-input" value="true">
                  <span class="checkmark">
                    Ya, Saya setuju
                  </span>
                  {{-- <span id="loading" class="ouro ouro3">
                    <span class="left"><span class="anim"></span></span>
                    <span class="right"><span class="anim"></span></span>
                  </span> --}}
                </label>
              </div>
              <div class="custom-control">
                <label for="aggreement1" class="container-radio">
                  <input name="1" id="aggreement1" type="radio" class="custom-control-input box-control-input" value="true">
                  <span class="checkmark">
                    Tidak, Saya tidak setuju
                  </span>
                  {{-- <span id="loading" class="ouro ouro3">
                    <span class="left"><span class="anim"></span></span>
                    <span class="right"><span class="anim"></span></span>
                  </span> --}}
                </label>
              </div>
              <div class="flex flex-wrap -mx-4" id="cont-btn">
                <div class="relative w-full px-4 max-w-full" style="min-height: 1px">
                  <button class="btn btn-fill btn-fill-center btn-lg block my-0 mx-auto" style="margin: 0 auto!important;" onclick="toDisclaimerStep()">
                    Lanjut
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="disclaimerStep">
        <p class="text-center mb-4 mt-2" style="font-size: .9rem;color:#888">
          Jawab pertanyaan berikut berdasarkan <b>seberapa sering</b> 
          kamu mengalami situasi tersebut dalam kurun waktu <b>4 minggu</b> terakhir. <br> 
          <b>Pilih jawaban yang paling menggambarkan diri kamu,</b> karena 
          <span style="color: #ff0000;"><strong>tidak ada jawaban yang benar dan salah</strong></span>
        </p>
        <div class="answer-area mb-4">
          <div class="flex flex-wrap -mx-4 justify-between m-10">
            <div class="ml-5">
              <button class="btn-xs btn-outfill btn w-20" id="disc-prev" onclick="toApprovalStep()">
                Kembali 
              </button>
            </div>
            <div class="mr-5">
              <button class="btn btn-xs btn-fill w-20" id="disc-next" onclick="toQuizStep()">
                Lanjut
              </button>
            </div>
          </div>
        </div>
      </div>
      <div id="quizStep">
        <div class="flex flex-wrap justify-center items-center">
          <div class="relative w-full min-h-0 px-4">
            <x-quiz-pagination />
            <h6 class="sub-head mb-2">Pertanyaan</h6>
            <div class="question-area mb-6">
              <h5 class="question-head-bold" id="question-text"><b>ddd</b></h5>
            </div>
            <x-quiz-choice />
            <br>
            <div>
              <div class="flex flex-wrap -mx-4 justify-between">
                <div class="ml-5">
                  <button class="btn-xs btn-outfill btn w-20" id="qprev" onclick="prevQuestion()">
                    Kembali 
                  </button>
                </div>
                <div>
                  <p class="text-center" id="question-info" id="qnum"></p>
                </div>
                <div class="mr-5">
                  <button class="btn btn-xs btn-fill w-20" id="qnext" onclick="nextQuestion()">
                    Lanjut
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="emailStep">
        <div>
          <div class="question-area mb-6">
            <h5 for="id_input" class="question-head">Email</h5> 
            <small class="form-text text-muted">Isi dengan email aktif yang kamu gunakan</small>
          </div>
          <div class="answer-area mb-3">
            <input id="id_input" type="email" placeholder="Example : hallo@ibunda.id" name="0" class="input-md emailinput form-control">
          </div>
          <div class="answer-area mb-4">
            <div class="flex flex-wrap -mx-4 justify-between m-10">
              <div class="ml-5">
                <button class="btn-xs btn-outfill btn w-20" id="disc-prev" onclick="prevQuestion()">
                  Kembali 
                </button>
              </div>
              <div class="mr-5">
                <button class="btn btn-xs btn-fill w-20" id="disc-next" onclick="toResult()">
                  Lanjut
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="resultStep">
        <div class="flex flex-wrap -mx-4 justify-center items-center">
          <div class="max-w-full relative w-full px-4">
              <div class="relative w-full px-4 text-center mx-auto">
                  <img src="https://www.ibunda.id/tespsikologi/assets/img/warning.png" class="img-thumbnail" style="border: none;">
              </div>
              <h4 class="question-intro-head">Yuk Cek Hasilnya!</h4>
              <p>Kamu sudah berhasil mengisi Test Kesehatan Online by Ibunda.id - Konseling Dengan Psikolog. Hasilnya menunjukan...</p>
              <div class="rekomendasi-area">
                  <h5 id="result-title"></h5>
                  <p id="result-wording"></p>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    let introStep = true;
    let approvalStep = false;
    let disclaimerStep = false;
    let quizStep = false;
    let emailStep = false;
    let resultStep = false;
    let qnum = 0;
    let qtot = $('#pagination').data('length');
    var questions;
    var tp = 0,
      jr = 0,
      kd = 0,
      sr = 0,
      sl = 0,
      maxQuestion = 0;
    var answer = [];
    var temp;
    let score;
    let finalResult;
    var resultData;
    
    $(document).ready(function() {
      getQuestion();
      $('#qnext').hide();

      if (introStep == false) {
        $('#introStep').hide();
      }
      if (approvalStep == false) {
        $('#approvalStep').hide();
        $('#cont-btn').hide();
        
      }
      if (disclaimerStep == false) {
        $('#disclaimerStep').hide();
      }
      if (quizStep == false) {
        $('#quizStep').hide();
      }
      if (emailStep == false) {
        $('#emailStep').hide();
      }
      if (resultStep == false) {
        $('#resultStep').hide();
      }
      
      $('#aggreement0').click(function() {
        $('#aggreement1').prop('checked', false);
        setTimeout(() => {
          $('#cont-btn').show();
          this.approvalStep = false;
          $(this).attr('checked', 'checked');
          $('#approvalStep').hide();
          $('#disclaimerStep').show();
        }, 1000);
      });
      $('#aggreement1').click(function() {
        $('#aggreement0').prop('checked', false);
        setTimeout(() => {
          $('#cont-btn').hide();
          this.approvalStep = false;
          $(this).attr('checked', 'checked');
          $('#approvalStep').hide();
          $('#introStep').show();
        }, 1000);
      });

      $('#ans-tp').click(function () {
        temp = 'tp';
        if (qnum < qtot) {
          if (temp != answer[qnum-1]) {
            subsAnswer(answer[qnum-1]);
            tp++;
            answer.splice(qnum-1, 1, 'tp');
          } else {
            inputAnswer('tp');
          }
          nextQuestion();
        }
        if (qnum == qtot) {
          if (answer.length != qtot) {
            inputAnswer('tp');
          } else {
            toEmail();
          }
        }
      });
      $('#ans-jr').click(function () {
        temp = 'jr';
        if (qnum < qtot) {
          if (temp != answer[qnum-1]) {
            subsAnswer(answer[qnum-1]);
            jr++;
            answer.splice(qnum-1, 1, 'jr');
          } else {
            inputAnswer('jr');
          }
          nextQuestion();
        }
        if (qnum == qtot) {
          if (answer.length != qtot) {
            inputAnswer('jr');
          } else {
            toEmail();
          }
        }
      });
      $('#ans-kd').click(function () {
        temp = 'kd';
        if (qnum < qtot) {
          if (temp != answer[qnum-1]) {
            subsAnswer(answer[qnum-1]);
            kd++;
            answer.splice(qnum-1, 1, 'kd');
          } else {
            inputAnswer('kd');
          }
          nextQuestion();
        }
        if (qnum == qtot) {
          if (answer.length != qtot) {
            inputAnswer('kd');
          } else {
            toEmail();
          }
        }
      });
      $('#ans-sr').click(function () {
        temp = 'sr';
        if (qnum < qtot) {
          if (temp != answer[qnum-1]) {
            subsAnswer(answer[qnum-1]);
            sr++;
            answer.splice(qnum-1, 1, 'sr');
          } else {
            inputAnswer('sr');
          }
          nextQuestion();
        }
        if (qnum == qtot) {
          if (answer.length != qtot) {
            inputAnswer('sr');
          } else {
            toEmail();
          }
        }
      });
      $('#ans-sl').click(function () {
        temp = 'sl';
        if (qnum < qtot) {
          if (temp != answer[qnum-1]) {
            subsAnswer(answer[qnum-1]);
            sl++;
            answer.splice(qnum-1, 1, 'sl');
          } else {
            inputAnswer('sl');
          }
          nextQuestion();
        }
        if (qnum == qtot) {
          if (answer.length != qtot) {
            inputAnswer('sl');
          } else {
            toEmail();
          }
        }
      });
    });

    subsAnswer = (ans) => {
      if (ans == 'tp') {
        tp--;
      } else if (ans == 'jr') {
        jr--;
      } else if (ans == 'kd') {
        kd--;
      } else if (ans == 'sr') {
        sr--;
      } else if (ans == 'sl') {
        sl--;
      }
    }

    inputAnswer = (ans) => {
      if (ans == 'tp') {
        tp++;
        maxQuestion++;
        answer.push('tp');
      } else if (ans == 'jr') {
        jr++;
        maxQuestion++;
        answer.push('jr');
      } else if (ans == 'kd') {
        kd++;
        maxQuestion++;
        answer.push('kd');
      } else if (ans == 'sr') {
        sr++;
        maxQuestion++;
        answer.push('sr');
      } else if (ans == 'sl') {
        sl++;
        maxQuestion++;
        answer.push('sl');
      }
      
    }

    prevQuestion = () => {
      if (this.emailStep == true) {
        this.emailStep = false;
        this.quizStep = true;
        $('#emailStep').hide();
        $('#quizStep').show();
      }
      if (qnum > 0) {
        qnum--;

        temp = answer[qnum-1];
        addQuestionText(qnum-1);
        $('#question-info').text(`${qnum} dari ${qtot}`);
      } 
      if (qnum == 0) {
        toDisclaimerStep();
      }
      showNextBtn();
    }

    nextQuestion = () => {
      if (qnum < qtot) {
        qnum++;
      }
      
      addQuestionText(qnum-1);
      $('#question-info').text(`${qnum} dari ${qtot}`);
      showNextBtn();
      if (qnum == qtot) {
        toEmail();
      }
    }

    showNextBtn = () => {
      if (answer[qnum-1] === undefined) {
        $('#qnext').hide();
      } else {
        $('#qnext').show();
      }
    }

    toEmail = () => {
      calculateResult();
      this.quizStep = false;
      this.emailStep = true;
      $('#quizStep').hide();
      $('#emailStep').show();
    }

    calculateResult = () => {
      this.score = (tp * 1) + (jr * 2) + (kd * 3) + (sr * 4) + (sl * 5);
      this.finalResult = (this.score);
      getResult();
    }

    toResult = () => {
      addResultText();
      this.emailStep = false;
      this.resultStep = true;
      $('#emailStep').hide();
      $('#resultStep').show();
    }

    startQuiz = () => {
      this.introStep = false;
      this.approvalStep = true;
      $('#introStep').hide();
      $('#approvalStep').show();
    }

    toApprovalStep = () => {
      this.approvalStep = true;
      this.disclaimerStep = false;
      $('#disclaimerStep').hide();
      $('#approvalStep').show();
    }
    
    toDisclaimerStep = () => {
      this.approvalStep = false;
      this.disclaimerStep = true;
      $('#approvalStep').hide();
      $('#quizStep').hide();
      $('#disclaimerStep').show();
    }
    
    toQuizStep = () => {
      this.disclaimerStep = false;
      this.quizStep = true;
      $('#disclaimerStep').hide();
      $('#quizStep').show();

      qnum++

      addQuestionText(qnum-1);
      $('#question-info').text(`${qnum} dari ${qtot}`);
    }

    assignQuestion = (data) => {
      questions = data;
    }
    assignResult = (res) => {
      resultData = res;
    }

    addQuestionText = (num) => {
      $('#question-text').text(questions.data[num].question);
    }

    addResultText = () => {
      $('#result-title').text(resultData.data.title);
      $('#result-wording').text(resultData.data.result);
    }

    getQuestion = () => {
      $.ajax({
        url: "/questions",
        type: "GET",
        dataType: 'json',
        success: function (response) {
          assignQuestion(response);
        }
      });

      getResult = () => {
        $.ajax({
          url: "/result",
          type: "GET",
          data: { score: this.finalResult },
          dataType: 'json',
          success: function (response) {
            assignResult(response);
          }
        });
      }
    }
  </script>
</body>
</html>
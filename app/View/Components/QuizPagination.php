<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Question;

class QuizPagination extends Component
{
    public $len;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->len = $this->length();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.quiz-pagination');
    }

    public function length() {
        $questionCount = Question::count();

        return $questionCount;
    }

    public function width() {
        $width = ((100/($this->length())) -1);

        return $width;
    }

    public function lll() {
        return 11;
    }
}

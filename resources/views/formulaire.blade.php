@extends('layouts.app')

@section('content')
<div class="form-container">
    <form id="questionnaire" action="{{ route('formulaire.submit') }}" method="POST">
        @csrf

        <!-- Question 1 -->
        <div class="question">
            <label for="q1">1. Etes-vous disponible pour suivre la formation ?</label>
            <select id="q1" name="q1" required>
                <option value="" selected>Choisir...</option>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        </div>

        <!-- Question 2 -->
        <div class="question">
            <label for="q2">2. Avez-vous le niveau requis (minimum BAC2) ?</label>
            <select id="q2" name="q2" required>
                <option value="" selected>Choisir...</option>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        </div>

        <!-- Question 3 -->
        <div class="question">
            <label for="q3">3. Votre PC respecte les conditions ?</label>
            <select id="q3" name="q3" required>
                <option value="" selected>Choisir...</option>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        </div>

        <!-- Question 4 -->
        <div class="question">
            <label for="q4">4. Vous êtes-vous acquittés de vos droits de formation ?</label>
            <select id="q4" name="q4" required>
                <option value="" selected>Choisir...</option>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        </div>

        <!-- Bouton Suivant -->
        <button id="nextBtn" type="submit" disabled>Suivant</button>
    </form>
</div>

<style>
    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        max-width: 700px;
        margin: auto;
        padding: 2rem;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        width: 100%;
    }

    .question {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        align-items: center;
    }

    label {
        font-weight: bold;
        color: #333;
    }

    select {
        padding: 0.5rem;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 1rem;
        width: 80%;
        max-width: 400px;
    }

    #nextBtn {
        padding: 0.8rem;
        border: none;
        border-radius: 5px;
        background-color: grey;
        color: white;
        cursor: not-allowed;
        font-weight: bold;
        font-size: 1rem;
        width: 50%;
        max-width: 200px;
        margin: auto;
        transition: background-color 0.3s ease;
    }

    #nextBtn.active {
        background-color: orange;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 1rem;
        }
        select, #nextBtn {
            width: 100%;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        label {
            font-size: 0.9rem;
        }
        select, #nextBtn {
            font-size: 0.8rem;
            padding: 0.6rem;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selects = document.querySelectorAll("select");
        const nextBtn = document.getElementById("nextBtn");

        function checkForm() {
            let allFilled = true;
            selects.forEach(sel => {
                if (sel.value === "") {
                    allFilled = false;
                }
            });
            if (allFilled) {
                nextBtn.classList.add("active");
                nextBtn.disabled = false;
            } else {
                nextBtn.classList.remove("active");
                nextBtn.disabled = true;
            }
        }

        selects.forEach(sel => {
            sel.addEventListener("change", checkForm);
        });
    });
</script>
@endsection
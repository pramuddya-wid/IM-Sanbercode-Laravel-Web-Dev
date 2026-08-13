@extends('layouts.master')
@section('title')
    Register

@endsection

@section('content')

    <h2>Sign Up Form</h2>

    <form action="/welcome" method="POST">
        @csrf

        <label>First Name:</label><br />
        <br />
        <input type="text" name="firstName" /><br />
        <br />

        <label>Last Name:</label><br />
        <br />
        <input type="text" name="lastName" /><br />
        <br />

        <label>Gender:</label><br />
        <br />
        <input type="radio" name="gender" value="1" />Male <br />
        <input type="radio" name="gender" value="2" />Female<br />
        <input type="radio" name="gender" value="3" />Other<br />
        <br />

        <label>Nationality:</label><br />
        <br />
        <select name="nationality">
            <option value="1">Indonesian</option>
            <option value="2">Foreigner</option>
        </select><br />
        <br />

        <label>Language Spoken:</label><br />
        <br />
        <input type="checkbox" name="Language" value="1" />Bahasa Indonesia<br />
        <input type="checkbox" name="Language" value="2" />English<br />
        <input type="checkbox" name="Language" value="3" />Other<br />
        <br />

        <label>Bio:</label><br /><br />
        <textarea name="Bio" id="" cols="40" rows="10"></textarea><br />
        <br />
        <input type="submit" value="Sign Up" />
    </form>

@endsection
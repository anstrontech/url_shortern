@extends('layout')

@section('content')
<div id="profile-edit-save" class="mt-5 container">
  <div id="profile-edit-area">
  <form method="POST" action="{{ url('userprofile') }}">
    @csrf
        <div id="edit-area-left">
            <table>
            <tbody>
                <tr>
                <td class="edit-title">Name:</td>
                <td><input type="text" name="name" value="{{ $name }}" class="profileInputBox"/></td>
                </tr>
                <tr>
                <td class="edit-title">Username:</td>
                <td><input type="text" value="{{ $username }}" class="profileInputBox" disabled/></td>
                </tr>
            </tbody>
            </table>
        </div>
        <div id="edit-area-right">
        <table>
            <tbody>
                <tr>
                    <td class="edit-title">E-mail:</td>
                    <td><input type="text" value="{{ $email }}" class="profileInputBox" disabled/></td>
                </tr>
                <tr>
                <td class="edit-title">Password:</td>
                <td><input type="password" name="password" value="{{ $password }}" class="profileInputBox" /></td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <button id="editSave" class="btn btn-sm btn-default bg-primary">Update Profile</button>
        </div>
    </form>
  </div>
</div>
@stop
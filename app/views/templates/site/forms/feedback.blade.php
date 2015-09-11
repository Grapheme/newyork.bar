{{ Form::open(array('route'=>'contact_feedback','id'=>'contacts-form','class'=>'contacts-form')) }}
<div class="control-group">
    <label for="name">Представьтесь пожалуйста</label>
    <input type="text" class="inpval" name="name" id="name" value="">
</div>
<div class="control-group">
    <label for="email">Email</label>
    <input type="text" class="inpval" name="email" id="email" value="">
</div>
<div class="control-group">
    <label for="phone">Ваш контактный телефон</label>
    <input type="text" class="inpval" name="phone" id="phone" value="">
</div>
<div class="control-group">
    <label for="text">Сообщение или вопрос?</label>
    <textarea class="inpval" name="text" id="text" rows="5"></textarea>
</div>
<div class="control-group">
    <button value="send" name="submit" id="submit" type="submit">Отправить</button>
</div>
{{ Form::close() }}
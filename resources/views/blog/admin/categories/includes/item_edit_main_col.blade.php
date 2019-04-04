@php
    /** @var \App\Models\BlogCategory $item */
@endphp


<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link">Основные данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{ old('title', $item->title) }}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   >
                        </div>

                        <div class="form-group">
                            <label for="slug">Индетификатор</label>
                            <input name="slug" value="{{ $item->slug }}"
                                   id="slug"
                                   type="text"
                                   class="form-control"
                                   >
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Родитель</label>
                            <select name="parent_id"
                                    id="parent_id"
                                    type="text"
                                    class="form-control"
                                    placeholder="Выберете категорию"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == $item->parent_id) selected @endif>
                                        {{ $categoryOption->id }} . {{ $categoryOption->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description"
                                      id="description"
                                      type="text"
                                      class="form-control"
                                      rows="3">{{ old('description', $item->description) }}</textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

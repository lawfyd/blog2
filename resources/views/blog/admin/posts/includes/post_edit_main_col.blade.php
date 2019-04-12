@php
    /** @var \App\Models\BlogPost $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-helper">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link active" data-toggle="tab" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a href="#adddata" class="nav-link" data-toggle="tab" role="tab">Доп.данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <input name="id" type="hidden" value="{{ $item->id }}">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{ $item->title }}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required
                            >
                            <div class="form-group">
                                <label for="title">Статья</label>
                                <textarea name="content_raw" id="content_raw"
                                          class="form-control"
                                          rows="20">{{ old('content_raw', $item->content_raw) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    placeholder="Выберете категорию"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Индетификатор</label>
                            <input name="slug" value="{{ $item->slug }}"
                                   id="slug"
                                   type="text"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Выдержка</label>
                            <textarea name="excerpt" id="content_raw"
                                      class="form-control"
                                      rows="20">{{ old('excerpt', $item->excerpt) }}</textarea>
                        </div>

                        <div class="form-check">
                            <input name="is_published"
                                   value="0"
                                   type="hidden">

                            <input name="is_published"
                                   type="checkbox"
                                   class="form-check-input"
                                   value="1"
                                   @if($item->is_published)
                                   checked="checked"
                                   @endif>
                            <label for="is_published" class="form-check-label">Опубликовано</label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
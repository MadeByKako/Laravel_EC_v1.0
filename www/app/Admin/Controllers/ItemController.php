<?php

namespace App\Admin\Controllers;

use App\Models\Item;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ItemController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Item';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Item());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('price', __('Price'));
        $grid->column('description', __('Description'));
        $grid->column('image', __('Image'))->image();
        $grid->column('category_id', __('Category id'))->editable('select', Category::all()->pluck('category_name', 'id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Item::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('price', __('Price'));
        $show->field('description', __('Description'));
        $show->field('image', __('Image'))->image();
        $show->field('category.category_name', __('Category Name'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Item());

        $form->text('name', __('Name'));
        $form->number('price', __('Price'));
        $form->textarea('description', __('Description'));
        $form->image('image', __('Image'));
        $form->select('category_id', __('Category Name'))->options(Category::all()->pluck('category_name', 'id'));

        return $form;
    }
}

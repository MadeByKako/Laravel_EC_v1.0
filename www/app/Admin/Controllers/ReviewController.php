<?php

namespace App\Admin\Controllers;

use App\Models\Review;
use App\Models\Item;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReviewController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Review';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Review());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('star', __('Star'));
        $grid->column('text', __('Text'));
        $grid->column('item_id', __('Item id'))->editable('select', Item::all()->pluck('name', 'id'));
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
        $show = new Show(Review::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('star', __('Star'));
        $show->field('text', __('Text'));
        $show->field('item.name', __('Item name'));
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
        $form = new Form(new Review());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->number('star', __('Star'));
        $form->textarea('text', __('Text'));
        $form->select('item_id', __('Item id'))->options(Item::all()->pluck('name', 'id'));

        return $form;
    }
}

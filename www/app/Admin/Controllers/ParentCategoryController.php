<?php

namespace App\Admin\Controllers;

use App\Models\ParentCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ParentCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ParentCategory';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ParentCategory());

        $grid->column('id', __('Id'));
        $grid->column('parent_category_name', __('Parent category name'));
        $grid->column('description', __('Description'));
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
        $show = new Show(ParentCategory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_category_name', __('Parent category name'));
        $show->field('description', __('Description'));
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
        $form = new Form(new ParentCategory());

        $form->text('parent_category_name', __('Parent category name'));
        $form->textarea('description', __('Description'));

        return $form;
    }
}

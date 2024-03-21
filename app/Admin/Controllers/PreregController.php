<?php

namespace App\Admin\Controllers;

use App\Models\prereg_user;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PreregController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '事前預約玩家';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new prereg_user());

        $grid->column('phone', __('手機號碼')); 
        $grid->column('type', __('型號'));
        $grid->column('ip', __('Ip'));
        $grid->column('created_at', __('建立時間'));
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('ip', 'ip');
            $filter->equal('phone', '手機號碼');
        });
        $grid->disableRowSelector();

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
        $show = new Show(prereg_user::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('phone', __('Phone'));
        $show->field('type', __('Type'));
        $show->field('ip', __('Ip'));
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
        $form = new Form(new prereg_user());

        $form->mobile('phone', __('手機號碼'));
        $form->text('type', __('手機型號'));
        $form->ip('ip', __('Ip'));

        return $form;
    }
}

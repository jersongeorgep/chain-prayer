<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= $totalMembers; ?></h3>
        <p>Members</p>
      </div>
      <a href="<?= site_url('prayerchain/printdata/members_wise'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= $totalFaithhomes; ?></h3>

        <p>Local Faith Homes</p>
      </div>
      <a href="<?= site_url('masters/local-fhs'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?= $totalGroups; ?></h3>

        <p>Groups</p>
      </div>
      <a href="<?= site_url('prayerchain/printdata'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?= $totalCenters; ?></h3>
        <p>Center Faith Homes</p>
      </div>
      <a href="<?= site_url('masters/center-fhs'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-success">
      <div class="card-header ">
        <h3 class="card-title text-bold">Group Vacant</h3>
        <ul class="card-tools nav nav-tabs card-header-tabs">
          <?php 
            $groups = get_groups();
            //print_r($groups);
            $b = 0;
            foreach($groups as $group):
          ?>
          <li class="nav-item"><a class="nav-link <?= (($b == 0)? 'active' : ''); ?>" href="#<?= $group->group_code; ?>" data-toggle="tab"><?= $group->group_code; ?></a></li>
          <?php 
          $b ++;
          endforeach; ?>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <?php 
          $a = 0;
          $sl = 0;
          foreach($groups as $group): 
            
          ?>
          <div class="tab-pane <?= (($a == 0)? 'active' : ''); ?>" id="<?= $group->group_code; ?>">
            <?php 
              $data = get_groups_vacant($group->group_code, $group->center_id); 
              
            ?>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-success table-sm">
                <thead>
                  <th width="10%" class="text-center">Sl No.</th>
                  <th width="20%" class="text-center">Group No.</th>
                  <th width="20%" class="text-center">Vacant Time</th>
                  <th width="15%" class="text-center">Max Allowed</th>
                  <th width="15%" class="text-center">No. of Members</th>
                  <th width="20%" class="text-center">No. of Vacant </th>
                </thead>
                <tbody>
                  <?php for($y = 0; $y <count($data); $y++):?>
                   <?php  $sl++; ?>
                  <tr>
                    <td class="text-center"><?= $sl; ?></td>
                    <td class="text-center text-bold"><?= $data[$y]['group_no']; ?></td>
                    <td class="text-center text-bold"><?= $data[$y]['time']; ?></td>
                    <td class="text-center"><?= $data[$y]['max_members']; ?></td>
                    <td class="text-center"><?= $data[$y]['no_members']; ?></td>
                    <td class="text-center text-bold"><?= $data[$y]['no_vacant']; ?></td>
                  </tr>
                  <?php endfor; ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php 
          $a++;
          endforeach; ?>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
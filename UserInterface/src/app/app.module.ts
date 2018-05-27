import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { PropertyManagerComponent } from './property-manager/property-manager.component';
import { TenantComponent } from './tenant/tenant.component';
import { ServiceProviderComponent } from './service-provider/service-provider.component';
import { Router, RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { TenantDashComponent } from './tenant/tenant-dash/tenant-dash.component';
import { LeasesComponent } from './tenant/leases/leases.component';
import { LeasePaymentComponent } from './tenant/lease-payment/lease-payment.component';
import { PaymentHistoryComponent } from './tenant/payment-history/payment-history.component';

const appRoutes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  { path: 'home', component: HomeComponent  },
  { path: 'property', component: PropertyManagerComponent },
  {path: 'tenant', component: TenantComponent },
  { path: 'serviceprovider',  component: ServiceProviderComponent},
  { path: 'login',  component: LoginComponent }
];


@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    PropertyManagerComponent,
    TenantComponent,
    ServiceProviderComponent,
    HomeComponent,
    TenantDashComponent,
    LeasesComponent,
    LeasePaymentComponent,
    PaymentHistoryComponent
  ],
  imports: [
    BrowserModule,
    RouterModule,
    [RouterModule.forRoot(appRoutes)],

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

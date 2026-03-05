import { useState, useRef, useEffect } from 'react';
import { useForm } from 'react-hook-form';
import SignatureCanvas from 'react-signature-canvas';
import { toast } from 'sonner';
import { CheckCircle, X } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '../components/ui/card';
import { Button } from '../components/ui/button';
import { Input } from '../components/ui/input';
import { Label } from '../components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '../components/ui/select';
import { Textarea } from '../components/ui/textarea';
import { Badge } from '../components/ui/badge';

type FormData = {
  firstName: string;
  middleName: string;
  lastName: string;
  dateOfBirth: string;
  email: string;
  phone: string;
  address: string;
  city: string;
  zipCode: string;
  membershipType: string;
  occupation: string;
  employer: string;
  monthlyIncome: string;
  idType: string;
  idNumber: string;
  emergencyName: string;
  emergencyPhone: string;
  emergencyRelation: string;
};

export function MembershipApply() {
  const { register, handleSubmit, formState: { errors }, setValue } = useForm<FormData>();
  const signatureRef = useRef<SignatureCanvas>(null);
  const [signatureData, setSignatureData] = useState<string>('');
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [heroVisible, setHeroVisible] = useState(false);

  useEffect(() => {
    const t = setTimeout(() => setHeroVisible(true), 100);
    return () => clearTimeout(t);
  }, []);

  const clearSignature = () => {
    signatureRef.current?.clear();
    setSignatureData('');
  };

  const saveSignature = () => {
    if (signatureRef.current) {
      setSignatureData(signatureRef.current.toDataURL());
      toast.success('Signature saved');
    }
  };

  const onSubmit = async (data: FormData) => {
    if (!signatureData) {
      toast.error('Please provide your signature');
      return;
    }
    setIsSubmitting(true);
    await new Promise(resolve => setTimeout(resolve, 2000));
    toast.success('Application submitted successfully! We will contact you within 5-7 business days.');
    setIsSubmitting(false);
  };

  return (
    <div className="flex flex-col">

      {/* ── Hero ── */}
      <section className="relative text-white py-24 sm:py-32 overflow-hidden">
        <div
          className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center"
          style={{ transition: 'transform 20s linear', transform: heroVisible ? 'scale(1)' : 'scale(1.05)' }}
        />
        <div className="absolute inset-0 bg-gradient-to-br from-black/70 via-primary/60 to-black/70" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="max-w-3xl">
            <Badge className="mb-4 bg-white/20 text-white border-white/30 backdrop-blur-sm">Application Form</Badge>
            <h1 className="text-5xl sm:text-6xl font-bold mb-6 leading-tight">Membership Application</h1>
            <p className="text-xl text-blue-100 leading-relaxed">
              Complete the form below to begin your journey with us. All fields are required unless marked optional.
            </p>
          </div>
        </div>
      </section>

      {/* ── Form ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <form onSubmit={handleSubmit(onSubmit)} className="space-y-8">

            {/* Personal Information */}
            <Card className="rounded-2xl bg-card/90 backdrop-blur-sm border-border/50 shadow-sm">
              <CardHeader>
                <CardTitle>Personal Information</CardTitle>
              </CardHeader>
              <CardContent className="space-y-6">
                <div className="grid md:grid-cols-3 gap-4">
                  <div className="space-y-2">
                    <Label htmlFor="firstName">First Name</Label>
                    <Input id="firstName" {...register('firstName', { required: true })} className="rounded-lg" />
                    {errors.firstName && <span className="text-sm text-destructive">Required</span>}
                  </div>
                  <div className="space-y-2">
                    <Label htmlFor="middleName">Middle Name</Label>
                    <Input id="middleName" {...register('middleName')} className="rounded-lg" />
                  </div>
                  <div className="space-y-2">
                    <Label htmlFor="lastName">Last Name</Label>
                    <Input id="lastName" {...register('lastName', { required: true })} className="rounded-lg" />
                    {errors.lastName && <span className="text-sm text-destructive">Required</span>}
                  </div>
                </div>

                <div className="grid md:grid-cols-2 gap-4">
                  <div className="space-y-2">
                    <Label htmlFor="dateOfBirth">Date of Birth</Label>
                    <Input id="dateOfBirth" type="date" {...register('dateOfBirth', { required: true })} className="rounded-lg" />
                    {errors.dateOfBirth && <span className="text-sm text-destructive">Required</span>}
                  </div>
                  <div className="space-y-2">
                    <Label>Membership Type</Label>
                    <Select onValueChange={(value) => setValue('membershipType', value)}>
                      <SelectTrigger className="rounded-lg"><SelectValue placeholder="Select type" /></SelectTrigger>
                      <SelectContent>
                        <SelectItem value="regular">Regular Member (₱500)</SelectItem>
                        <SelectItem value="associate">Associate Member</SelectItem>
                      </SelectContent>
                    </Select>
                  </div>
                </div>

                <div className="grid md:grid-cols-2 gap-4">
                  <div className="space-y-2">
                    <Label htmlFor="email">Email Address</Label>
                    <Input id="email" type="email" {...register('email', { required: true })} className="rounded-lg" />
                    {errors.email && <span className="text-sm text-destructive">Required</span>}
                  </div>
                  <div className="space-y-2">
                    <Label htmlFor="phone">Phone Number</Label>
                    <Input id="phone" type="tel" {...register('phone', { required: true })} className="rounded-lg" />
                    {errors.phone && <span className="text-sm text-destructive">Required</span>}
                  </div>
                </div>

                <div className="space-y-2">
                  <Label htmlFor="address">Complete Address</Label>
                  <Textarea id="address" {...register('address', { required: true })} className="rounded-lg" rows={3} />
                  {errors.address && <span className="text-sm text-destructive">Required</span>}
                </div>

                <div className="grid md:grid-cols-2 gap-4">
                  <div className="space-y-2">
                    <Label htmlFor="city">City/Municipality</Label>
                    <Input id="city" {...register('city', { required: true })} className="rounded-lg" />
                    {errors.city && <span className="text-sm text-destructive">Required</span>}
                  </div>
                  <div className="space-y-2">
                    <Label htmlFor="zipCode">Zip Code</Label>
                    <Input id="zipCode" {...register('zipCode', { required: true })} className="rounded-lg" />
                    {errors.zipCode && <span className="text-sm text-destructive">Required</span>}
                  </div>
                </div>
              </CardContent>
            </Card>

            {/* Identification */}
            <Card className="rounded-2xl bg-card/90 backdrop-blur-sm border-border/50 shadow-sm">
              <CardHeader><CardTitle>Identification</CardTitle></CardHeader>
              <CardContent className="space-y-6">
                <div className="grid md:grid-cols-2 gap-4">
                  <div className="space-y-2">
                    <Label>ID Type</Label>
                    <Select onValueChange={(value) => setValue('idType', value)}>
                      <SelectTrigger className="rounded-lg"><SelectValue placeholder="Select ID type" /></SelectTrigger>
                      <SelectContent>
                        <SelectItem value="passport">Passport</SelectItem>
                        <SelectItem value="drivers">Driver's License</SelectItem>
                        <SelectItem value="national">National ID</SelectItem>
                        <SelectItem value="sss">SSS ID</SelectItem>
                      </SelectContent>
                    </Select>
                  </div>
                  <div className="space-y-2">
                    <Label htmlFor="idNumber">ID Number</Label>
                    <Input id="idNumber" {...register('idNumber', { required: true })} className="rounded-lg" />
                    {errors.idNumber && <span className="text-sm text-destructive">Required</span>}
                  </div>
                </div>
              </CardContent>
            </Card>

            {/* Emergency Contact */}
            <Card className="rounded-2xl bg-card/90 backdrop-blur-sm border-border/50 shadow-sm">
              <CardHeader><CardTitle>Emergency Contact</CardTitle></CardHeader>
              <CardContent className="space-y-6">
                <div className="grid md:grid-cols-3 gap-4">
                  <div className="space-y-2">
                    <Label htmlFor="emergencyName">Full Name</Label>
                    <Input id="emergencyName" {...register('emergencyName', { required: true })} className="rounded-lg" />
                    {errors.emergencyName && <span className="text-sm text-destructive">Required</span>}
                  </div>
                  <div className="space-y-2">
                    <Label htmlFor="emergencyPhone">Phone Number</Label>
                    <Input id="emergencyPhone" type="tel" {...register('emergencyPhone', { required: true })} className="rounded-lg" />
                    {errors.emergencyPhone && <span className="text-sm text-destructive">Required</span>}
                  </div>
                  <div className="space-y-2">
                    <Label htmlFor="emergencyRelation">Relationship</Label>
                    <Input id="emergencyRelation" {...register('emergencyRelation', { required: true })} className="rounded-lg" />
                    {errors.emergencyRelation && <span className="text-sm text-destructive">Required</span>}
                  </div>
                </div>
              </CardContent>
            </Card>

        
            {/* Submit */}
            <div className="flex justify-end gap-4 pb-4">
              <Button
                type="submit"
                size="lg"
                disabled={isSubmitting}
                className="bg-gradient-to-r from-primary to-secondary rounded-xl shadow-lg font-bold px-10"
              >
                {isSubmitting ? 'Submitting...' : 'Submit Application'}
              </Button>
            </div>

          </form>
        </div>
      </section>

    </div>
  );
}